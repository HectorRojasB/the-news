<template>
    <div class="news-card">
        <div class="header">
            <div class="category">
                {{ this.category }}
            </div>
            <div class="region">
                {{ this.region }}
            </div>
        </div>
        <div class="content">
            {{ this.content}}
        </div>
        <div class="footer">
            <div class="date">
                {{ this.creation }}
            </div>
            <div class="links">
                Leer más en
                <span v-for="(link, index) in this.links" :key="links.short">
                    <span v-if="index !== 0"> & </span>
                    <a :href="link.url">
                        {{link.short}}
                    </a>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'category',
            'region',
            'content',
            'creation',
            'links'
        ]
    }
</script>
