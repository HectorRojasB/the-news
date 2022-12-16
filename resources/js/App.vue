<template>
    <div class="grid-container">
        <div class="empty-state" v-if="posts.length < 0">
                No hay noticias aun
        </div>

        <div class="grid-x align-center">
            <div class="cell large-8">
                <div class="header">
                    <h3>Stetic News</h3>
                    <input placeholder="Buscar">
                </div>
                <NewsCard v-for="post in posts"
                          :category="post.category"
                          :region="post.region"
                          :content="post.content"
                          :creation="post.creation"
                          :links="post.links"
                />
                <div class="pagination-container">
                    {{ this.pagination.current_page }} de {{ this.pagination.total_pages }}
                    <div class="pagination-controls">
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import NewsCard from "./components/NewsCard.vue";

    export default  {
        components: {NewsCard},
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
        },
        methods: {
            changePage(link) {
                console.log(link)
            }
        }
    }
</script>
