<template>
    <div class="news-card">
        <div class="header">
            <div class="category">
                {{ this.post.category }}
            </div>
            <div class="region">
                {{ this.post.region }}
            </div>
        </div>
        <div class="content">
            {{ this.post.content }}
        </div>
        <div class="footer">
            <div class="date">
                {{ this.post.creation }}
            </div>
            <div class="links">
                Leer más en
                <span
                    v-for="(link, index) in this.post.links"
                    :key="this.post.links.short"
                >
                    <span v-if="index !== 0"> & </span>
                    <a :href="link.url">
                        {{ link.short }}
                    </a>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        post: Object,
    },
};
</script>
