<template>
    <div class="grid-container">
        <div class="empty-state" v-if="store.posts.length < 0">
                No hay noticias aun
        </div>

        <div class="grid-x align-center">
            <div class="cell large-8">
                <div class="header">
                    <h3>The News</h3>
                    <input placeholder="Buscar">
                </div>
                <NewsCard v-for="post in store.posts"
                          :category="post.category"
                          :region="post.region"
                          :content="post.content"
                          :creation="post.creation"
                          :links="post.links"
                />
                <Pagination/>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import { store } from './store.js'
    import NewsCard from "./components/NewsCard.vue"
    import Pagination from "./components/Pagination.vue"

    export default  {
        computed: {
            store() {
                return store
            }
        },
        components: {Pagination, NewsCard},
        data() {
            return {
                pagination: []
            }
        },
        created() {
            axios.get('/api/post').then(response => {
                store.posts = response.data.data
                store.pagination = response.data.meta.pagination
            })
        }
    }
</script>
