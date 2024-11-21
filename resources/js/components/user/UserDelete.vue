<script>
export default {
    props: {
        user: {
            type: Object,
            required: true,
            default: null,
        },
    },
    methods: {
        confirmDelete() {
            this.$emit('delete', this.user.id);
        },
    },
};
</script>

<template>
    <v-card>
        <v-card-title class="text-h5">
            Confirm delete
        </v-card-title>
        <v-card-text>
            Delete user <strong>{{ user?.name }}</strong>?
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="red" @click="confirmDelete">
                Delete
            </v-btn>
            <v-btn color="blue-grey" @click="$emit('close')">
                Cancel
            </v-btn>
        </v-card-actions>
    </v-card>
</template>
