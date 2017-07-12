<?php
$types = [
    'debug' => 'Debug:',
    'info' => 'Info:',
    'success' => 'Success!',
    'warning' => 'Warning!',
    'danger' => 'Error!',
];
?>

<div class="card card-inverse card-{{ session('flash')['type'] }} alert-flash">
  <div class="card-header">
    <strong>{{ $types[session('flash')['type']] }}</strong> {{ session('flash')['title'] }}
  </div>
  <div class="card-block">
    {{ session('flash')['message'] }}
  </div>
</div>