require 'rubygems'
require 'sinatra/base'
require 'thin'
require 'twilio-ruby'

EM.run do
  
  class App < Sinatra::Base

    get '/twilio' do
      EM::add_timer(10) do 
        settings.client.account.sms.messages.create(
            :from => settings.number,
            :to => params[:phone],
            :body => params[:message]
            )
      end
      
      "Sent"
    end
    
  end

  sid = "AC628740b68945d768079c67893e207f88"
  token = "2ca709975e3419c2546740a1a9e6aeec"
  number = "+18064290947"
  client = Twilio::REST::Client.new sid, token

  App.set :client, client
  App.set :number, number

  if ARGV.empty?
    ip = "localhost"
    port = 3000
  else
    ip, port = ARGV[0].split(":")
    port = port.to_i
  end
  
  Thin::Server.start App, ip, port
end
