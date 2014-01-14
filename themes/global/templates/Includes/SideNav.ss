<ul>
  <% control Menu(1) %>
  <% if Children %>
  <li>
    <h2 class="$LinkingMode">$MenuTitle</h2>
    <% if Children %>
    <ul class="back_title">
      <% control Children %>
      <li><a href="$Link" title="Go to the $Title.XML page" class="$LinkingMode"<% if is_a(RedirectorPage) %> target="_blank" <% end_if %>><span>$MenuTitle</span></a></li>
      <% end_control %>
      <li></li>
    </ul>
    <% end_if %>
  </li>
  <% end_if %>
  <% end_control %>
</ul>
