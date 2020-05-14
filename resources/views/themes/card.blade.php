
<div class="card-body d-flex flex-row">
  
  @if( Auth::id() === $theme->user_id )
  <a href="{{ route('users.show', ['name' => $theme->user->name]) }}" class="text-dark">
    <i class="fab fa-phoenix-framework fa-2x mr-1 red-text"></i>
  </a>
  @elseif( Auth::id() !== $theme->user_id )
  <a href="{{ route('users.show', ['name' => $theme->user->name]) }}" class="text-dark">
    <i class="far fa-grin-squint-tears fa-2x mr-1"></i>
  </a>
  @endif
    <div>
      <div class="font-weight-bold">{{ $theme->user->name }}</div>
      <div class="font-weight-lighter">{{ $theme->created_at->format('Y/m/d H:i') }}</div>
    </div>

  @if( Auth::id() === $theme->user_id )
    <!-- dropdown -->
      <div class="ml-auto card-text">
        <div class="dropdown">
          <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('themes.show', ['theme' => $theme]) }}">
              <i class="fas fa-list mr-2"></i>回答一覧
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('themes.edit', ['theme' => $theme]) }}">
              <i class="fas fa-pen mr-1"></i>お題を更新する
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $theme->id }}">
              <i class="fas fa-trash-alt mr-1"></i>お題を削除する
            </a>
          </div>
        </div>
      </div>
      <!-- dropdown -->

      <!-- modal -->
      <div id="modal-delete-{{ $theme->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form method="POST" action="{{ route('themes.destroy', ['theme' => $theme]) }}">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                このお題を削除します。よろしいですか？
              </div>
              <div class="modal-footer justify-content-between">
                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                <button type="submit" class="btn btn-danger">削除する</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- modal -->
  
    @elseif( Auth::id() !== $theme->user_id )
    <div class="ml-auto card-text">
        <div class="dropdown">
          <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('themes.show', $theme) }}">
              <i class="fas fa-list mr-2"></i>回答一覧
            </a>
          </div>
        
        </div>
    </div> 
    @endif   

  </div>


  <div class="card-body pt-0 ">
    <div class="card-text mx-auto" style="width: 100%;">
      <h3 class="font-weight-bold" style="color: black;">
      {!! nl2br(e($theme->body)) !!}
      </h3>
    </div>
  </div>

  @foreach($theme->tags as $tag)
    @if($loop->first)
      <div class="card-body pt-0 pb-4 pl-3">
        <div class="card-text line-height">
    @endif
          <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
            {{ $tag->hashtag }}
          </a>
    @if($loop->last)
        </div>
      </div>
    @endif
  @endforeach
  



