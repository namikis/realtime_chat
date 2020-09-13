<template>
    <div class="chat_field">
        <div class="chat_items" id="chat_id">
            <div v-for="text in this.textItems" :key="text.id">
                <p class="chat_item item_me" v-if="text.sender_id == loginInfo['user_id']"><span>{{text.chat_text}}</span></p>
                <p class="chat_item item_you" v-else><span>{{text.chat_text}}</span></p>
            </div>
        </div>

        <div class="chat_input">
            <input type="text" placeholder="テキストを入力" v-model="textSend" v-on:keyup.enter="sendText()">
            <input type="submit" value="送信" @click="sendText()">
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['login_info', 'room_id', 'opp_id'],
    data(){
        return {
            textItems:[],
            textSend:''
        }
    },
    methods:{
        getText(){
            var params = new URLSearchParams();
            params.append('room_id', this.roomId);
            axios.post("/api/chat/getText", params)
                    .then(res => {
                        this.textItems = res.data.textItems;
                    });
        },
        sendText(){
            var mode=1; //sended
            var params = new URLSearchParams();
            params.append('room_id', this.roomId);
            params.append('sender_id', this.loginInfo['user_id']);
            params.append('chat_text', this.textSend);
            axios.post("/api/chat/sendText", params)
                    .then(res => {
                        this.textSend="";
                    });
            this.getText();
            setTimeout(this.goBottom, 1000);
        },
        reload(){
            var reload = null;
            reload = setInterval(this.getText, 3000);
        },
        goBottom(){
            var obj = document.getElementById("chat_id");
            if(!obj) return;

            $(obj).animate({
                scrollTop:obj.scrollHeight
            }, 500, "swing");
        },
        goBottomFirst(){
            var obj = document.getElementById("chat_id");
            if(!obj) return;
            obj.scrollTop = obj.scrollHeight;
        }
    },
    created(){
        this.loginInfo = JSON.parse(this.login_info);
        this.roomId = JSON.parse(this.room_id);
        this.oppId = JSON.parse(this.opp_id);

        this.getText();
        //this.reload();
        //setTimeout(this.goBottomFirst, 1000);
    }
    ,updated(){

    }
}
</script>