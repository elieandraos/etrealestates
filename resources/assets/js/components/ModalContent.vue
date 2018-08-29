<template>
    <div class="v-modal-content">
        <div class="v-modal-header">
            <h5 class="v-modal-title">
                <slot name="title"></slot>
            </h5>
            <button type="button" class="v-close" @click="$modal.hide(name)"><span>&times;</span></button>
        </div>
        <div class="v-modal-body">
            <slot name="content"></slot>
        </div>
        <div class="v-modal-footer">
            <slot name="actions"></slot>
        </div>
    </div>  
</template>

<script>
export default {
    props: ['name'] 
};
</script>