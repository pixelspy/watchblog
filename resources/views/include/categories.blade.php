<section class="text-center">
  @if(count($categories) > 0)
  @foreach($categories as $category)
      <a href="/categories/{{$category->id}}">
        <button class="btnCategory">
          <p class="categoryText">{{$category->name}}</p>
        </button>
      </a>
  @endforeach
  @endif
</section>
