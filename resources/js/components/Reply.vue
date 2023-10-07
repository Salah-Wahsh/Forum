<template>


    <transition name="fade" mode="out-in">
        <div v-if="!deleted" :key="reply.id">
            <div class="card mb-3 mt-3">
                <div :id="'reply-' + reply.id" class="card-header">
                    <div class="level">
                        <h6 class="flex">
                            <a :href="'/profile/' + reply.owner.name">{{ reply.owner.name }}</a> said
                            {{ formattedCreatedAt }}
                        </h6>
                        <div v-if="isAuthenticated">
                            <button :class="classes" @click="toggleFav">
                                <i class="fa fa-heart"></i>
                                <span v-text="favoritesCount"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div v-if="editing">
                        <textarea v-model="editedReply" class="form-control"></textarea>
                    </div>
                    <div v-else v-text="editedReply">
                    </div>
                    <br>

                    <div class="panel-footer level mr-1" v-if="isReplyCreator">
                        <button class="btn btn-sm" @click="toggleEdit">{{ editing ? 'Save' : 'Edit' }}</button>
                        <button class="btn btn-danger btn-sm" @click="deleteReply" >Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </transition>

</template>


<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter, .fade-leave-to {
    opacity: 0;
}
</style>

<script>

import moment from 'moment';

export default {


    name: 'Reply',
    props: {
        reply: Object,
        auth: Boolean,
        doer: Object

    },


    data() {
        console.log("Current d Prop:", this.doer); // Add this line
        return {
            editing: false,
            editedReply: this.reply.body,
            deleted: false, // Add the 'deleted' flag
            favoritesCount: this.reply.favCount,
            isFavorited: this.reply.isFavorited,
            isAuthenticated: this.auth,
        };

    },

    methods: {
        async toggleEdit() {
            if (this.editing) {
                console.log("THE REAL VALUE" + this.isReplyCreator + "ownerReply: " + this.reply.owner.id + "currentReg: " + this.doer)

                try {
                    // Send an Axios request to update the reply
                    await axios.patch(`/replies/${this.reply.id}`, {body: this.editedReply});
                    // After successfully saving, toggle editing mode
                    this.editing = false;
                } catch (error) {
                    // Handle errors (e.g., show an error message)
                    console.error('Error saving reply:', error);
                }
            } else {
                // Toggle the editing mode if not in edit mode
                this.editing = true;
            }
        },
        async deleteReply() {
            axios.delete(`/replies/${this.reply.id}`);
            this.deleted = true;

        },
       async toggleFav() {
            if (this.isFavorited) {
                axios
                    .delete(`/replies/${this.reply.id}/favorites`)
                    .then(() => {
                        this.isFavorited = false;
                        this.favoritesCount--;
                    })
                    .catch((error) => {
                        console.error('Error unfavoriting reply:', error);
                    });
            } else {
                axios
                    .post(`/replies/${this.reply.id}/favorites`)
                    .then(() => {
                        this.isFavorited = true;
                        this.favoritesCount++;
                    })
                    .catch((error) => {
                        console.error('Error favoriting reply:', error);
                    });
            }
        },

    },
    computed: {
        formattedCreatedAt() {
            return moment(this.reply.created_at).fromNow();
        },
        isReplyCreator() {
            // Check if the current user is the creator of the reply
            return this.isAuthenticated && this.doer.id === this.reply.owner.id;
        },
        classes(){
          return ['btn', this.isFavorited? 'btn-danger': 'btn-default'];
        },
    },
};

</script>
