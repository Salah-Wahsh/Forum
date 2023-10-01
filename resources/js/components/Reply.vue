<template>
    <div class="card">
        <div :id="'reply-' + reply.id" class="card-body">
            <div class="level">
                <h6 class="flex">
                    <a :href="'/profile/' + reply.owner.name">{{ reply.owner.name }}</a> said {{ reply.created_at_diffForHumans }}
                </h6>
            </div>
        </div>
        <!-- Rest of your Reply.vue component content -->
    </div>
</template>
<script>
export default {
    name: 'Reply',
    props: {
        reply: Object,
    },
    data(){
    return{
        editing: false
    };
}
}

</script>
