<template>
    <div class="flex h-screen">
        <Users @SelectedUserId="handleUserSelected"/>
        <Blank v-if="!selectedUserId"/>
        <Chat v-else :messages="messages" />

    </div>
</template>

<script>
import Users from '../components/chat/Users.vue';
import Chat from '../components/chat/Main.vue';
import Blank from '../components/chat/Blank.vue';

export default {
    components: {
        Users,
        Chat,
        Blank
    },
    data() {
        return {
            selectedUserId: null,
            messages: [],
            authUserId: null,
        };
    },
    methods: {
        handleUserSelected(id) {
            this.selectedUserId = id;
            this.getMessageDetails(this.selectedUserId);
        },
        async getMessageDetails(id) {
            try {
                const response = await axios.get(`/api/messages-details/${id}`);
                this.messages = [];
                response.status === 200 ? this.messages = response.data : this.messages = [];
                    console.log(this.messages)

            } catch (error) {
                console.error(error.message);
            }
        },
    },
};
</script>
