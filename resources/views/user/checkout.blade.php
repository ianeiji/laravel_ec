<p>決済ページへリダイレクトします。</p>
<script src="https://js.stripe.com/v3/"></script>
<script>
 // Stripeを初期化
 const publicKey = '{{ $publicKey }}'
 const stripe = Stripe(publicKey)

 window.onload = function() {
// リダイレクト後の処理
 stripe.redirectToCheckout({
 sessionId: '{{ $session->id }}'
 }).then(function (result) {
 window.location.href = '{{ route('user.cart.index') }}';
 });
 }
</script>
