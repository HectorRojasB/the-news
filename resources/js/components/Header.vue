<template>
    <div class="header">
        <h3>The News</h3>
        <input
            class="input"
            placeholder="Buscar"
            v-model="searchParam"
            v-on:keyup="search"
        />
    </div>
</template>

<script>
import { searchPosts, getPosts } from "../utils/apiRoutes";

export default {
    data() {
        return {
            searchParam: "",
        };
    },
    methods: {
        search() {
            this.searchParam.length > 1
                ? searchPosts(this.searchParam)
                : getPosts();
        },
    },
};
</script>
