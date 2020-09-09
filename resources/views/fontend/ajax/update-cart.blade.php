<h4>Thông tin đơn hàng</h4>
                            <table class="table">
                                <tr>
                                    <td>Tạm tính</td>
                                    <td>
                                        {{ number_format($total) }} <span> đ</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phí giao hàng</td>
                                    <td>0 <span> đ</span></td>
                                </tr>
                                <tr class="text-total">
                                    <td>Tổng cộng</td>
                                    <td>
                                        {{ number_format($total + $ship) }}</span> <span> đ</span>
                                        <input type="hidden" name="total" value="{{ $total + $ship }}">
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" value="Xác nhận giỏ hàng">