<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <nav aria-label="Page navigation">
          <ul class="pagination">

            <li class="disabled">
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>

            <li v-for="page in parseInt(pagination.total_pages, 10)">
              <a href="#">{{ page }}</a>
            </li>

            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>

          </ul>
        </nav>

      </div>
    </div>
  </div>
</template>

<script src="./paginator.js"></script>
