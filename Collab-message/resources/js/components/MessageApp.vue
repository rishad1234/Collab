<template>
    <div class="message-app">
        <Chat :contact="selectedContact" :messages="messages"/>
        <ContactList :contacts="contacts" @selected="startConversation"/>
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
        methods:{
            startConversation(contact){
                axios.get(`/conversation/${contact.id}`).then((res) =>{
                    this.messages = res.data;
                    this.selectedContact = contact;
                });
            }
        },
        components : {Chat, ContactList}
    }
</script>

<style lang="scss" scoped>
.message-app {
    display: flex;
}
</style>