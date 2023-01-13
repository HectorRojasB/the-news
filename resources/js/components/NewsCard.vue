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
                <span>
                    <a :href="post.link"> {{ post.link }} </a>
                </span>
            </div>
        </div>
    </div>
</template>
