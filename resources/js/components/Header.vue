<template>
    <div class="header">
        <h3>The News</h3>
        <input class="input"
               placeholder="Buscar"
               v-model="searchParam"
               v-on:keyup="search">
    </div>
</template>

<script>
    import axios from "axios";
    import {store} from "../store";

    export default {
        data() {
            return {
                searchParam: ''
            }
        },
        methods: {
            search() {
                if(this.searchParam.length > 1) {
                    axios.get(`/api/search/${this.searchParam}`).then(response => {
                        store.posts = response.data.data
                        store.pagination = response.data.meta.pagination
                    })
                } else {
                    axios.get('/api/post').then(response => {
                        store.posts = response.data.data
                        store.pagination = response.data.meta.pagination
                    })
                }

            }
        }
    }

</script>
