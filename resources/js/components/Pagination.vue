<script setup>
import { store } from "../utils/store";
import { changePostsPage } from "../utils/apiRoutes";
</script>

<template>
    <div class="pagination-container">
        {{ store.pagination.current_page }} de
        {{ store.pagination.total_pages }}

        <div class="pagination-controls">
            <button
                class="button-small"
                :class="store.pagination.current_page === 1 ? 'disabled' : ''"
                @:click="changePostsPage(store.pagination.links.previous)"
            >
                &laquo;
            </button>

            <button
                class="button-small"
                :class="
                    store.pagination.current_page ===
                    store.pagination.total_pages
                        ? 'disabled'
                        : ''
                "
                @:click="changePostsPage(store.pagination.links.next)"
            >
                &raquo;
            </button>
        </div>
    </div>
</template>
