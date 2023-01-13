<script setup>
import { onMounted, computed } from "vue";
import { store } from "./utils/store.js";
import { getPosts } from "./utils/apiRoutes";

import NewsCard from "./components/NewsCard.vue";
import Pagination from "./components/Pagination.vue";
import Search from "./components/Search.vue";

onMounted(() => {
    getPosts();
});

const news = computed(() => {
    return store;
});
</script>

<template>
    <div class="grid-container">
        <div class="grid-x align-center">
            <div class="cell large-8">
                <Search />
                <div class="empty-state" v-if="news.posts.length === 0">
                    No hay noticias
                </div>
                <NewsCard
                    v-for="post in news.posts"
                    :post="post"
                    :key="post.id"
                />
                <Pagination v-if="news.posts.length > 1" />
            </div>
        </div>
    </div>
</template>
