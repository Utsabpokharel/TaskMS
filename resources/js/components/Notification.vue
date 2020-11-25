<template>

</template>


<script>
    export default {
        data() {
            return {
                notifications: {},
            }
        },
        methods: {
            loadNotification() {
                axios.get('/notification').then(({data}) => (this.notifications = data.data));
            },
        },
        created() {

            setInterval(()=>this.loadNotification(), 3000);
        },
    }
</script>