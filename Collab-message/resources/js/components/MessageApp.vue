<template>
    <div class="message-app">
        <Chat :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
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
            
            Echo.private(`messages.` + this.user.id)
                .listen('NewMessage', (e) => {
                    console.log("echo");
                    this.handleIncoming(e.message);
                });

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
            },
            saveNewMessage(message){
                this.messages.push(message);
            },
            handleIncoming(message){
                console.log("dukhse function");
                if (this.selectedContact && message.user_from == this.selectedContact.id) {
                    this.saveNewMessage(message);
                    console.log("dhukse if");
                    return;
                }
                alert(message.message);
            },

        },
        components : {Chat, ContactList}
    }
</script>

<style lang="scss" scoped>
.message-app {
    display: flex;
}
</style>