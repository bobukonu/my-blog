

        @if (isset($categoryName))

        <div class="alert alert-info" role="alert">
          Category: <strong>{{ $categoryName}}</strong>
        </div>

        @endif

        @if (isset($tagName))

        <div class="alert alert-info" role="alert">
          Tagged: <strong>{{ $tagName}}</strong>
        </div>

        @endif

        @if (isset($authorName))

        <div class="alert alert-info" role="alert">
          Author: <strong>{{ $authorName}}</strong>
        </div>

        @endif

        @if ($term = request('term'))

        <div class="alert alert-info" role="alert">
          Search Result for: <strong>{{ $term}}</strong>
        </div>

        @endif
