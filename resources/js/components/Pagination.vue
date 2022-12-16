<template>
    <div class="pagination-container">
        {{ store.pagination.current_page }} de {{ store.pagination.total_pages }}

        <div class="pagination-controls">
            <button class="button-small"
                    :class="store.pagination.current_page === 1 ? 'disabled' : ''"
                    v-on:click="this.changePage(store.pagination.links.previous)" >
                &laquo;
            </button>

            <button class="button-small"
                    :class="store.pagination.current_page === store.pagination.total_pages ? 'disabled' : ''"
                    v-on:click="this.changePage(store.pagination.links.next)">
                &raquo;
            </button>
        </div>

    </div>
</template>

<script>
    import axios from "axios";
    import {store} from "../store"

    export default {
        computed: {
            store() {
                return store
            }
        },
        props: [
            'pagination'
        ],
        methods: {
            changePage(url) {
                axios.get(url).then( response => {
                    store.posts = response.data.data
                    store.pagination = response.data.meta.pagination

                })
            },
        },
    }
</script>
