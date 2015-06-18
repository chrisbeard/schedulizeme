#!/usr/bin/ruby

#Brittle script to scrape all Binghamton University course info for
#the "next" semester off BU web-site into a tab-separated results
#on stdout.

require "selenium-webdriver"

include Selenium::WebDriver
include Selenium::WebDriver::Support

BASE_URL = 
  'http://www.binghamton.edu/' +
  'registrar/students/course-registration/schedule-of-classes/'

def go
  driver = Selenium::WebDriver.for :firefox
  
  #go to schedule page
  driver.navigate.to BASE_URL
  
  #Schedule page: click on 'View schedule' link
  element = driver.find_element(:partial_link_text => 'View schedule')
  element.click
  
  #Semester selction page: select 2nd element in semester select and
  #click submit
  semester_select = Select.new(driver.find_element(:name => 'p_term'))
  semester_select.select_by(:index, 1)
  semester_submit = driver.find_element(:xpath => "//input[@type='submit']")
  semester_submit.click
  
  #Course selection page: loop through all subjects, clicking submit for 
  #each
  subject_select = 
    Select.new(driver.find_element(:xpath => "//select[@name='sel_subj']"))
  subjects = subject_select.options
  subjects.shift
  wait = Wait.new
  (0...subjects.size).each do |i|
    subject_select = 
      Select.new(driver.find_element(:xpath => "//select[@name='sel_subj']"))
    subject_select.deselect_all
    subjects = subject_select.options
    subjects.shift
    subjects[i].click
    class_submit = driver.find_element(:xpath => "//input[@type='submit']")
    class_submit.click
    wait.until { driver.find_element(:class => 'banner_copyright') }
    scrape_department(driver)
    driver.navigate.back
    wait.until { driver.find_element(:class => 'banner_copyright') }
  end
  
  driver.quit
  
end

def scrape_department(driver)
  content_table = driver.find_element(:css => 'table.datadisplaytable')
  rows = content_table.find_elements(:xpath => './tbody/tr')
  rows.pop #remove results summary row
  0.step(rows.size - 1, 2) do |r|
    heading = rows[r].find_element(:tag_name => 'a').text
    heads = 
      heading.scan /^(.+?)\s*-\s*([^\-]+)\s*-\s*([^\-]+)\s*-\s*([^\-]+)$/
    warn "bad heading #{heading}" if heads.size != 1 || heads[0].size != 4
    title, crn, dept_num, section = heads[0].map(&:strip)
    dept, num = dept_num.split /\s+/
    if rows[r + 1].attribute('innerHTML') !~ /datadisplaytable/
      type, time, days, where, date_range, schedule_type, instructors = ['-']*7
      print "#{dept},#{num},#{section},#{crn},#{title},#{type}," +
        "#{time},#{days},#{where},#{date_range},#{schedule_type}," +
        "#{instructors}\n"
    else
      data_table = rows[r + 1].find_element(:class => 'datadisplaytable')
      data_rows = data_table.find_elements(:xpath => './tbody/tr')
      data_rows.shift #remove heading
      data_rows.each do |data_row|
        type, time, days, where, date_range, schedule_type, instructors =
          data_row.find_elements(:tag_name => 'td').map(&:text)
        print "#{dept},#{num},#{section},#{crn},#{title},#{type}," +
          "#{time},#{days},#{where},#{date_range},#{schedule_type}," +
          "#{instructors}\n"
      end
    end
  end
end

go
