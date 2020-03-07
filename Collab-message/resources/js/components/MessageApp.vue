<template>
    <div class="message-app">
        <Chat :contact="selectedContact" :messages="messages"/>
        <ContactList :contacts="contacts"/>
    </div>
</template>

<script>
    import Chat from './Chat';
    import ContactList from './ContactList';
    export default {
        props:{
            user:{
                type: Object,
                required: true
            }
        },
        data(){
            return {
                selectedContact : null,
                messages : [],
                contacts : []
            };
        },
        mounted() {
            console.log(this.user);
            axios.get('/contacts').then((res) => {
                this.contacts = res.data;
            });
        },
        components : {Chat, ContactList}
    }
</script>
