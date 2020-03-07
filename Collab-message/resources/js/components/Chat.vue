<template>
    <div class="chat">
        <h1>{{ contact ? contact.name : 'select a Contact' }}</h1>
        <MessageBox :contact="contact" :messages="messages"/>
        <MessageComposer @send="sendMessage"/>
    </div>
</template>


<script>
    import MessageBox from './MessageBox';
    import MessageComposer from './MessageComposer';
    export default {
        props: {
            contact:{
                type: Object,
                default: null
            },
            messages:{
                type: Array,
                default: []
            },
        },
        methods:{
            sendMessage(text){
                console.log(text);
            }
        },
        components:{MessageBox, MessageComposer}
    }
</script>

<style lang="scss" scoped>
.chat {
    flex: 5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    h1 {
        font-size: 20px;
        padding: 10px;
        margin: 0;
        border-bottom: 1px dashed lightgray;
    }
}
</style>