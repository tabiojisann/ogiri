<?php

namespace App\Http\Controllers;

use \App\Theme;
use \App\User;
use \App\Answer;
use App\Tag;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ThemeRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ThemeController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Theme::class, 'theme');
    }

    public function index(User $user) {

        $themes = Theme::all()->sortByDesc('created_at');
      
        // dd($themes);
    
        return view('themes.index', ['themes' => $themes]);
        }

        public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });
 
        return view('themes.create', [
            'allTagNames' => $allTagNames,
        ]);    
    }

    public function store(ThemeRequest $request, Theme $theme) 
    {
        
        $theme->fill($request->all());
        
      
        if (isset($theme->image)) {
            $file_name = $request->image->getClientOriginalName();
            $theme->image = $request->image->storeAs('public/theme_images', isset($time).'_' .Auth::user()->id . $file_name);
          }

        $theme->user_id = $request->user()->id;
        $theme->save();

        $request->tags->each(function ($tagName) use ($theme) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $theme->tags()->attach($tag);
        });

        return redirect()->route('themes.index'); 
            
    } 

    

       
    

    public function edit(Theme $theme)
    {

        $tagNames = $theme->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('themes.edit', [
            'theme' => $theme,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
        ]);
    }

    public function update(ThemeRequest $request, Theme $theme)
    {
        $theme->fill($request->all());

        if (isset($theme->image)) {
            $file_name = $request->image->getClientOriginalName();
            $theme->image = $request->image->storeAs('public/theme_images', isset($time).'_' .Auth::user()->id . $file_name);
        }

        $theme->tags()->detach();
        $request->tags->each(function ($tagName) use ($theme) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $theme->tags()->attach($tag);
        });
        
        $theme->save();
        return redirect()->route('themes.index');
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();
        Storage::Delete($theme->image);
        return redirect()->route('themes.index');
    }

    public function show(Theme $theme, Answer $answer, User $user)
    {
        // $answers = Answer::where($theme)->orderBy('created_at', 'desc');
        $answers = Answer::all()->sortByDesc('created_at');
        return  view('themes.show', 
                    ['theme' => $theme, 
                    'answers' => $answers, 
                    'user' => $user]);
            
    }

}
