<template>
<div v-for="reply in itmes">
    <reply :data="reply"></reply>
</div>
</template>

<script>
import Reply from "@/components/Reply.vue";

export default {
    name: 'Replies',
    components: {Reply},
    props: [data],

    data(){
        return {
            items: this.data
        }
    }

}
</script>
