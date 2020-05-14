@csrf
<div class="form-group">
  <label class="mt-2 ">お題（必須）</label>
  <textarea name="body" required class="form-control" rows="5" placeholder="好きなテーマを書いてください">{{ $theme->body ?? old('body') }}</textarea>
</div>
<div class="form-group">
  <theme-tags-input
  :initial-tags='@json($tagNames ?? [])'
  :autocomplete-items='@json($allTagNames ?? [])'
  >
  </theme-tags-input>
</div>
<div class="form-group">
  <label>画像（任意）</label>
  <input id="file" type="file" name="image"  class="form-control" value="on">
</div>

 