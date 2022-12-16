<template>
    <div class="pagination-container">
        {{ this.pagination.current_page }} de {{ this.pagination.total_pages }}

        <div class="pagination-controls">
            <button class="button-small"
                    :class="this.pagination.current_page === 1 ? 'disabled' : ''"
                    v-on:click="this.changePage('previous')" >
                &laquo;
            </button>

            <button class="button-small"
                    :class="this.pagination.current_page === this.pagination.total_pages ? 'disabled' : ''"
                    v-on:click="this.changePage('next')">
                &raquo;
            </button>
        </div>

    </div>
</template>

<script>
    export default {
        props: [
            'pagination'
        ],
        methods: {
            changePage(action) {
                console.log(action)
            },
        },
    }
</script>
