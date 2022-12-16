import axios from "axios";
import {store} from "./store";

export const getPosts = () => {
    return axios.get('/api/post').then(response => {
        store.posts = response.data.data
        store.pagination = response.data.meta.pagination
    })
}

export const searchPosts = (param) => {
    return axios.get(`/api/search/${param}`).then(response => {
        store.posts = response.data.data
        store.pagination = response.data.meta.pagination
    })
}

export const changePostsPage = (url) => {
    return axios.get(url).then(response => {
        store.posts = response.data.data
        store.pagination = response.data.meta.pagination
    })
}
