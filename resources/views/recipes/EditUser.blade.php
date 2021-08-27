<div class="container">
    <div class="cadr">
        <div class="row">
            <div class="f">
                <form method="post">
                    <select v-model="user.is_admin" class="form-group select-css" name="is_admin"
                        style="margin-bottom: 60px">
                        <option value="" disabled selected>إختر</option>
                        <option value="1">
                            Admin
                        </option>
                        <option value="0">
                            User
                        </option>
                    </select>
                    <div @click="updateUser" class="button-form1">
                        <a>تحديث</a>
                    </div>
                    </from>
            </div>
        </div>
    </div>
</div>
