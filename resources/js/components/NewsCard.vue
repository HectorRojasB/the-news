<script setup>
const props = defineProps({
    post: Object,
});
</script>
<template>
    <div class="news-card">
        <div class="header">
            <div class="category">
                {{ post.category }}
            </div>
            <div class="region">
                {{ post.region }}
            </div>
        </div>
        <div class="content">
            {{ post.content }}
        </div>
        <div class="footer">
            <div class="date">
                {{ post.creation }}
            </div>
            <div class="links">
                Leer más en
                <span
                    v-for="(link, index) in post.links"
                    :key="post.links.short"
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
