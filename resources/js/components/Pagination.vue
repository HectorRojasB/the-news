<template>
    <div class="pagination-container">
        {{ store.pagination.current_page }} de {{ store.pagination.total_pages }}

        <div class="pagination-controls">
            <button class="button-small"
                    :class="store.pagination.current_page === 1 ? 'disabled' : ''"
                    v-on:click="changePostsPage(store.pagination.links.previous)" >
                &laquo;
            </button>

            <button class="button-small"
                    :class="store.pagination.current_page === store.pagination.total_pages ? 'disabled' : ''"
                    v-on:click="changePostsPage(store.pagination.links.next)">
                &raquo;
            </button>
        </div>

    </div>
</template>

<script>
    import {store} from "../utils/store"
    import {changePostsPage} from "../utils/apiRoutes"

    export default {
        methods: {changePostsPage},
        computed: {
            store() {
                return store
            }
        }
    }
</script>
