<template>
    <div class="flex h-screen ">
        <Users/>
        <!-- <Blank/> -->
        <Chat/>
    </div>
</template>
<script>
import Users from '../components/chat/Users.vue';
import Chat from '../components/chat/Main.vue';
import Blank from '../components/chat/Blank.vue';

export default {
    components:{
        Users,
        Chat,
        Blank
    }
}
</script>