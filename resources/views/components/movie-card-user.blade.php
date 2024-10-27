<div class="card rounded" style="width: 24rem;">
    <?php
header("Content-type: " . $movie->image_type);
echo '<img src="data:' . $movie->image_type . ';base64,' . base64_encode($movie->image) . '" class="card-img-top" alt="Imagem da Capa do filme">'
  ?>

    <div class="card-body">
        <h5 class="card-title">{{ $movie->title }}</h5>

        <h6 class="card-subtitle mb-2 text-muted">{{ $movie->gender_movie }}</h6>
        <p class="card-text"><strong style="margin-right: 10px">Nota ({{$movie->count_ratings()}}
                @if ($movie->count_ratings() == 1)
                    avaliação):
                @else
                    avaliações):
                @endif
                @if ($movie->has_ratings()) </strong>
                    @for ($i = 0; $i < (int) $movie->rating(); $i++)
                        <span class="fa fa-star checked" style="color: #0d6efd;font-size: larger;"> </span>
                    @endfor
                    @if ($movie->rating() - (int) $movie->rating() >= 0.5)
                        <span class="fa fa-star-half-o" style="color: #0d6efd; font-size: larger;" aria-hidden="true"></span>
                    @endif
                    @for ($i = 0; $i < 4 - $movie->rating() + 0.00001; $i++)
                        <span class="fa fa-star-o" style=";font-size: larger;color:#0d6efd"> </span>
                    @endfor
                @else
                    N/A</strong>
                @endif

        </p>

        <p class="card-text">
            {{ $movie->description }}
        </p>


        <div class="d-flex gap-3">
            <form action="{{ route('rent.create', ['movie' => $movie]) }}" method="post">
                <button type="submit" class="btn btn-primary" style="background: #4248F2 !important">Alugar</button>
            </form>
        </div>
    </div>
</div>