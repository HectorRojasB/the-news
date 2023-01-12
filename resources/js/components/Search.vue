<script setup>
import { ref } from "vue";
import { searchPosts, getPosts } from "../utils/apiRoutes";

const searchParam = ref("");

const search = () => {
    searchParam.value.length > 1 ? searchPosts(searchParam.value) : getPosts();
};
</script>

<template>
    <div class="search">
        <h3>The News</h3>
        <input
            class="input"
            placeholder="Buscar"
            v-model="searchParam"
            @:keyup="search()"
        />
    </div>
</template>

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
