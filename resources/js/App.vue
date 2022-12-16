<template>
    <div class="grid-container">
        <div class="empty-state" v-if="posts.length < 0">
                No hay noticias aun
        </div>

        <div class="grid-x align-center">
            <div class="cell large-8">
                <div class="header">
                    <h3>The News</h3>
                    <input placeholder="Buscar">
                </div>
                <NewsCard v-for="post in posts"
                          :category="post.category"
                          :region="post.region"
                          :content="post.content"
                          :creation="post.creation"
                          :links="post.links"
                />
                <Pagination
                    :pagination="this.pagination"
                />
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import NewsCard from "./components/NewsCard.vue"
    import Pagination from "./components/Pagination.vue"

    export default  {
        components: {Pagination, NewsCard},
        data() {
            return {
                posts: [],
                pagination: []
            }
        },
        created() {
            axios.get('/api/post').then(response => {
                this.posts = response.data.data
                this.pagination = response.data.meta.pagination
            })
        }
    }
</script>
