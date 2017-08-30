<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <nav aria-label="Page navigation">
          <ul class="pagination">

            <li>
              <a href="#" v-if="pagination.links.previous" aria-label="Previous" @click.prevent="gotoPage(pagination.current_page - 1)">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>

            <li
              v-for="page in parseInt(pagination.total_pages, 10)"
              v-bind:class ="{ 'active': page == pagination.current_page }"
            >
              <a href="#" @click.prevent="gotoPage(page)">{{ page }}</a>
            </li>

            <li>
              <a href="#" v-if="pagination.links.next" aria-label="Next" @click.prevent="gotoPage(pagination.current_page + 1)">
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
