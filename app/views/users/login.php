<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- Email -->
<div class="form-group">
    <label for="email" class="">Email: <sup>*</sup></label>
    <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
</div>

<!-- Password -->
<div class="form-group">
    <label for="password" class="">Password: <sup>*</sup></label>
    <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>