<script>
export default {
    props: {
        user: {
            type: Object,
            required: false,
            default: null,
        },
    },
    data() {
        return {
            form: { ...this.user },
        };
    },
    watch: {
        user: {
            handler(newVal) {
                this.form = { ...newVal };
            },
            deep: true,
        },
    },
    methods: {
        save() {
            if (this.form.name && this.form.email) {
                this.$emit("save", this.form);
            } else {
                console.error("Name and Email are required");
            }
        },
        close() {
            this.$emit("close");
        },
    },
};
</script>

<template>
    <v-card v-if="form">
        <v-card-title>Edit User</v-card-title>
        <v-card-text>
            <v-text-field
                v-model="form.name"
                label="Name"
                outlined
                required
            />
            <v-text-field
                v-model="form.email"
                label="Email"
                outlined
                required
            />
        </v-card-text>
        <v-card-actions>
            <v-btn color="green" @click="save">Save</v-btn>
            <v-btn color="red" @click="close">Cancel</v-btn>
        </v-card-actions>
    </v-card>
</template>
