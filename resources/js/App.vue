<template>
    <div class="grid-container">
        <div class="grid-x align-center">
            <div class="cell large-8">
                <Search />
                <div class="empty-state" v-if="store.posts.length === 0">
                    No hay noticias
                </div>
                <NewsCard
                    v-for="post in store.posts"
                    :category="post.category"
                    :region="post.region"
                    :content="post.content"
                    :creation="post.creation"
                    :links="post.links"
                />
                <Pagination v-if="store.posts.length > 1" />
            </div>
        </div>
    </div>
</template>

<script>
import { store } from "./utils/store.js";
import NewsCard from "./components/NewsCard.vue";
import Pagination from "./components/Pagination.vue";
import Search from "./components/Search.vue";
import { getPosts } from "./utils/apiRoutes";

export default {
    computed: {
        store() {
            return store;
        },
    },
    components: { Search, Pagination, NewsCard },
    created() {
        getPosts();
    },
};
</script>
