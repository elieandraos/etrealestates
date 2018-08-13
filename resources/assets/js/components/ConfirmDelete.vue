<template>
    <i class="fa fa-trash-o text-error" :title="title" data-toggle="tooltip"  data-placement="top" @click="confirm" style="cursor: pointer">
        
    </i>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                required: false,
                default: 'Delete'
            },
            url: {
                type: String,
                required: true
            }
        },
        methods: {
            confirm(event) {
                this.$swal({
                    title: 'Are you sure?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        this.performDelete();
                        $(event.target).closest("tr").remove();
                    }
                });
            },
            performDelete(){
                axios.delete(this.url).then(function(response){
                    swal("The record has been deleted!", {
                        icon: "success",
                    }); 
                });
            }
        },
        mounted() {
            
        },
    }
</script>
