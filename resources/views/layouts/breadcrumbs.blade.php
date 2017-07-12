<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
     @for($i = 0; $i < count($breadcrumbs); $i++)
     @if($i == count($breadcrumbs) - 1)
     <li class="breadcrumb-item">{{ $breadcrumbs[$i]['label'] }}</li>
     @else
     <li class="breadcrumb-item"><a href="{{ $breadcrumbs[$i]['url'] }}">{{ $breadcrumbs[$i]['label'] }}</a></li>
     @endif
     @endfor
  <!-- Breadcrumb Menu-->
  <li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
      <a class="btn btn-secondary" href="#"><i class="fa fa-comments" aria-hidden="true"></i></a>
      <a class="btn btn-secondary" href="#"><i class="fa fa-line-chart" aria-hidden="true"></i> &nbsp;Statistics</a>
      <a class="btn btn-secondary" href="#"><i class="fa fa-gear" aria-hidden="true"></i> &nbsp;Settings</a>
    </div>
  </li>
</ol>