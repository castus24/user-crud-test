<script>
import UserAdd from "../components/user/UserAdd.vue";
import UserUpdate from "../components/user/UserUpdate.vue";
import UserDelete from "../components/user/UserDelete.vue";

export default {
    components: {
        UserAdd,
        UserUpdate,
        UserDelete,
    },
    data() {
        return {
            users: [],
            selectedUser: null,
            showAddModal: false,
            showEditModal: false,
            showDeleteModal: false,
            itemsPerPage: 10,
            headers: [
                {title: "ID", key: "id", align: "start"},
                {title: "Name", key: "name", align: "start"},
                {title: "Email", key: "email", align: "start"},
                {title: "Created", key: "created_at", align: "start"},
                {title: "Edit", key: "edit", align: "start", sortable: false},
                {title: "Delete", key: "delete", align: "start", sortable: false},
            ],
            loading: true,
            totalItems: 0,
        };
    },
    mounted() {
        this.loadUsers({page: 1, itemsPerPage: this.itemsPerPage, sortBy: []});
    },
    methods: {
        async loadUsers({page, itemsPerPage, sortBy}) {
            this.loading = true;

            const sortParam = sortBy
                .map((sort) => (sort.order === "desc" ? `-${sort.key}` : sort.key))
                .join(",");

            const params = {
                page,
                itemsPerPage,
                sort: sortParam,
            };

            try {
                const response = await axios.get("/api/users", {params});

                const {data, meta} = response.data;
                this.users = data;
                this.totalItems = meta.total;
            } catch (error) {
                console.error("Error loading users:", error);
            } finally {
                this.loading = false;
            }
        },
        openAddModal() {
            this.showAddModal = true;
        },
        closeAddModal() {
            this.showAddModal = false;
        },
        openEditModal(user) {
            this.selectedUser = {...user};
            this.showEditModal = true;
        },
        closeEditModal() {
            this.selectedUser = null;
            this.showEditModal = false;
        },
        openDeleteModal(user) {
            this.selectedUser = {...user};
            this.showDeleteModal = true;
        },
        closeDeleteModal() {
            this.selectedUser = null;
            this.showDeleteModal = false;
        },
        async addUser(user) {
            try {
                const response = await axios.post(`/api/users`, user);
                this.users.push(response.data.data);
                this.closeAddModal();
            } catch (error) {
                console.error("Error adding user:", error);
            }
        },
        async updateUser(user) {
            try {
                const response = await axios.put(`/api/users/${user.id}`, user);
                const index = this.users.findIndex((u) => u.id === user.id);
                if (index !== -1) this.users.splice(index, 1, response.data.data);
                this.closeEditModal();
            } catch (error) {
                console.error("Error updating user:", error);
            }
        },
        async deleteUser(userId) {
            try {
                await axios.delete(`/api/users/${userId}`);
                this.users = this.users.filter((user) => user.id !== userId);
                this.closeDeleteModal()
            } catch (error) {
                console.error("Error deleting user:", error);
            }
        },
    },
};
</script>

<template>
    <v-container class="mt-5">
        <v-btn
            color="success"
            class="mb-5"
            @click="openAddModal"
        >
            Add User
        </v-btn>

        <v-card
        elevation="5">
            <v-data-table-server
                v-model:items-per-page="itemsPerPage"
                :headers="headers"
                :items="users"
                :items-length="totalItems"
                :loading="loading"
                @update:options="loadUsers"
            >
                <template #item.edit="{ item }">
                    <v-btn color="info" @click="openEditModal(item)">
                        <v-icon>mdi-pencil</v-icon>
                    </v-btn>
                </template>
                <template #item.delete="{ item }">
                    <v-btn color="red" @click="openDeleteModal(item)">
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
                </template>
            </v-data-table-server>
        </v-card>

        <v-dialog v-model="showAddModal" max-width="500px">
            <UserAdd
                @save="addUser"
                @close="closeAddModal"
            />
        </v-dialog>

        <v-dialog v-model="showEditModal" max-width="500px">
            <UserUpdate
                v-if="selectedUser"
                :user="selectedUser"
                @save="updateUser"
                @close="closeEditModal"
            />
        </v-dialog>

        <v-dialog v-model="showDeleteModal" max-width="500px">
            <UserDelete
                v-if="selectedUser"
                :user="selectedUser"
                @delete="deleteUser"
                @close="closeDeleteModal"
            />
        </v-dialog>
    </v-container>
</template>
