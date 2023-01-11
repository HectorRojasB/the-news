<template>
    <div class="search">
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

<style lang="scss">
.search {
    display: flex;
    align-items: center;
    justify-content: space-between;

    .input {
        padding: 8px;
    }
}
</style>
