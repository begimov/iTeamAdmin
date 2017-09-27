<template>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
      <span class="glyphicon glyphicon-sort" aria-hidden="true"></span><span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
      <li><a href="#" @click.prevent="applyOrder('created_at')">По дате</a></li>
      <li><a href="#" @click.prevent="applyOrder('id')">По номеру</a></li>
    </ul>
  </li>
</template>

<script src="./orderby.js"></script>
