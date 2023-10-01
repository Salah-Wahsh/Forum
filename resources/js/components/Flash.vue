<template>
    <div class="alert alert-success alert-flash" role="alert" v-show="show">
        <strong>Success!</strong> {{ body }}.
    </div>
</template>

<script>
import { ref, onMounted, inject } from 'vue';

export default {
    props: ['message'],
    setup(props) {
        const body = ref('');
        const show = ref(false);

        const flash = (message) => {
            body.value = message;
            show.value = true;
            hide();
        };

        const hide = () => {
            setTimeout(() => {
                show.value = false;
            }, 3000);
        };

        onMounted(() => {
            if (props.message) {
                flash(props.message);
            }

            const emitFlash = inject('emitFlash');
            if (emitFlash) {
                emitFlash(flash);
            }
        });

        return {
            body,
            show,
            flash,
        };
    },
};
</script>

<style scoped>
.alert-flash {
    position: fixed;
    bottom: 25px;
    right: 25px;
}
</style>
