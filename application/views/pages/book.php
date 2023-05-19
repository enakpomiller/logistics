

<div class="wrapper">
  <div class="photo">
    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MXx8ZG9uYXRpb258ZW58MHx8MHw%3D&ixlib=rb-1.2.1&w=400&q=80" alt="" />
    <div class="info">
      <h2>Save a child campaign</h2>
      <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
        <input type="hidden" name="public_key" value="YOUR PUBLIC KEY" />
        <input type="hidden" name="tx_ref" value="save-a-child-donation" />
        <input type="hidden" name="customer[email]" value="donate@gmail.com" />
        <input type="text" name="amount" placeholder="Amount" />
        <input type="hidden" name="currency" value="NGN" />
        <input type="hidden" name="redirect_url" value="http://example.com/success.php" />
        <button type="submit">Donate Now</button>
      </form>
    </div>
  </div>
</div>