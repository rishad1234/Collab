<template>
    <div class="message-app">
        <Chat :contact="selectedContact" :messages="messages"/>
        <ContactList :contact="contacts"/>
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
                console.log(res.data);
                this.contacts = res.data;
            });
        },
        components : {Chat, ContactList}
    }
</script>
